#!/bin/bash

# Load environment variables from .env
source database/migrations/capp/capp-scripts/env.sh

TIMESTAMP=$(date +"%F")
BACKUP_DIR="../capp-db"
REPO_DIR="/"  # Assuming your repository root is the project root

mkdir -p $BACKUP_DIR/$TIMESTAMP

# Export the database using credentials from .env
mysqldump -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE > $BACKUP_DIR/$TIMESTAMP/capp.sql

cd $REPO_DIR

# Copy the backup file to the repository
cp $BACKUP_DIR/$TIMESTAMP/capp.sql $REPO_DIR

# Git operations
git add capp.sql
git commit -m "Automated backup for $TIMESTAMP"
git push origin main
