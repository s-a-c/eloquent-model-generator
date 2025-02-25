#!/usr/bin/env bash

# Exit on error
set -e

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# Functions
validate_branch_name() {
    local branch=$1
    if [[ ! "$branch" =~ ^(feature|support|hotfix|release)/[a-z0-9-]+$ ]]; then
        echo -e "${RED}Invalid branch name: $branch${NC}"
        echo "Branch names must follow pattern:"
        echo "  feature/* - New features"
        echo "  support/* - Maintenance and issue fixes"
        echo "  hotfix/*  - Urgent production fixes"
        echo "  release/* - Release preparation"
        return 1
    fi
    return 0
}

validate_commit_message() {
    local message=$1
    if [[ ! "$message" =~ ^(feat|fix|docs|style|refactor|test|chore)\([a-z-]+\):\ .+ ]]; then
        echo -e "${RED}Invalid commit message: $message${NC}"
        echo "Commit messages must follow pattern: type(scope): message"
        return 1
    fi
    return 0
}

start_feature() {
    local name=$1
    if [ -z "$name" ]; then
        echo -e "${RED}Feature name required${NC}"
        return 1
    fi

    echo -e "${YELLOW}Starting feature: $name${NC}"

    # Update develop
    git checkout develop
    git pull origin develop

    # Create feature branch
    git checkout -b "feature/$name" develop

    echo -e "${GREEN}Feature branch created: feature/$name${NC}"
    echo "Make your changes and commit with format: feat(scope): message"
}

start_support() {
    local name=$1
    if [ -z "$name" ]; then
        echo -e "${RED}Support branch name required${NC}"
        return 1
    fi

    echo -e "${YELLOW}Starting support branch: $name${NC}"

    # Update develop
    git checkout develop
    git pull origin develop

    # Create support branch
    git checkout -b "support/$name" develop

    echo -e "${GREEN}Support branch created: support/$name${NC}"
    echo "Make your changes and commit with format: fix(scope): message"
}

finish_feature() {
    local current_branch
    current_branch=$(git rev-parse --abbrev-ref HEAD)

    if [[ ! "$current_branch" =~ ^feature/ ]]; then
        echo -e "${RED}Not on a feature branch${NC}"
        return 1
    fi

    echo -e "${YELLOW}Finishing feature: $current_branch${NC}"

    # Run quality checks
    echo "Running static analysis..."
    ./analyse.sh

    echo "Running tests..."
    composer test

    # Update from develop
    echo "Updating from develop..."
    git checkout develop
    git pull origin develop
    git checkout "$current_branch"
    git rebase develop

    # Push feature branch
    echo "Pushing feature branch..."
    git push origin "$current_branch"

    echo -e "${GREEN}Feature ready for review${NC}"
    echo "Create pull request: $current_branch -> develop"
}

finish_support() {
    local current_branch
    current_branch=$(git rev-parse --abbrev-ref HEAD)

    if [[ ! "$current_branch" =~ ^support/ ]]; then
        echo -e "${RED}Not on a support branch${NC}"
        return 1
    fi

    echo -e "${YELLOW}Finishing support branch: $current_branch${NC}"

    # Run quality checks
    echo "Running static analysis..."
    ./analyse.sh

    echo "Running tests..."
    composer test

    # Update from develop
    echo "Updating from develop..."
    git checkout develop
    git pull origin develop
    git checkout "$current_branch"
    git rebase develop

    # Push support branch
    echo "Pushing support branch..."
    git push origin "$current_branch"

    echo -e "${GREEN}Support branch ready for review${NC}"
    echo "Create pull request: $current_branch -> develop"
}

start_release() {
    local version=$1
    if [ -z "$version" ]; then
        echo -e "${RED}Version number required${NC}"
        return 1
    fi

    if [[ ! "$version" =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
        echo -e "${RED}Invalid version number: $version${NC}"
        echo "Version must follow semantic versioning: MAJOR.MINOR.PATCH"
        return 1
    fi

    echo -e "${YELLOW}Starting release: $version${NC}"

    # Update develop
    git checkout develop
    git pull origin develop

    # Create release branch
    git checkout -b "release/$version" develop

    # Update version numbers
    composer config version "$version"

    # Commit version bump
    git add composer.json
    git commit -m "chore(release): bump version to $version"

    echo -e "${GREEN}Release branch created: release/$version${NC}"
    echo "Update CHANGELOG.md and make final adjustments"
}

finish_release() {
    local current_branch
    current_branch=$(git rev-parse --abbrev-ref HEAD)

    if [[ ! "$current_branch" =~ ^release/ ]]; then
        echo -e "${RED}Not on a release branch${NC}"
        return 1
    fi

    local version=${current_branch#release/}

    echo -e "${YELLOW}Finishing release: $version${NC}"

    # Run quality checks
    echo "Running static analysis..."
    ./analyse.sh

    echo "Running tests..."
    composer test

    # Merge to main
    echo "Merging to main..."
    git checkout main
    git pull origin main
    git merge --no-ff "$current_branch" -m "chore(release): merge $current_branch into main"

    # Create tag
    git tag -a "v$version" -m "Release version $version"

    # Merge to develop
    echo "Merging to develop..."
    git checkout develop
    git pull origin develop
    git merge --no-ff "$current_branch" -m "chore(release): merge $current_branch into develop"

    # Push changes
    git push origin main develop "v$version"

    # Clean up
    git branch -d "$current_branch"
    git push origin :"$current_branch"

    echo -e "${GREEN}Release $version completed${NC}"
}

# Main script
case "$1" in
"start-feature")
    start_feature "$2"
    ;;
"finish-feature")
    finish_feature
    ;;
"start-support")
    start_support "$2"
    ;;
"finish-support")
    finish_support
    ;;
"start-release")
    start_release "$2"
    ;;
"finish-release")
    finish_release
    ;;
*)
    echo "Usage:"
    echo "  ./git-flow.sh start-feature <name>"
    echo "  ./git-flow.sh finish-feature"
    echo "  ./git-flow.sh start-support <name>"
    echo "  ./git-flow.sh finish-support"
    echo "  ./git-flow.sh start-release <version>"
    echo "  ./git-flow.sh finish-release"
    exit 1
    ;;
esac
