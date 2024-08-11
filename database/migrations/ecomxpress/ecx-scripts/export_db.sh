#!/bin/bash

# Load environment variables from .env
export $(grep -v '^#' .env | xargs)

TIMESTAMP=$(date +"%F")
BACKUP_DIR="database/migrations/ecomxpress/ecx-db"

# Create the backup directory if it doesn't exist
mkdir -p $BACKUP_DIR

# Export the database using credentials from .env
mysqldump -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE > $BACKUP_DIR/ecomxpress.sql

echo "Database exported to $BACKUP_DIR/ecomxpress.sql"
