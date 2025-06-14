@echo off
rem path to mysql server bin folder
cd "C:\xampp\mysql\bin"

rem credentials to connect to mysql server
set mysql_user=root
set mysql_password=

rem database to backup
set db_name=eventify

rem backup file name generation
set backup_path=C:\Users\user\Downloads\backup_database
set backup_name=%db_name%_backup

rem backup creation
mysqldump --user=%mysql_user% --password=%mysql_password% --routines --events %db_name% > "%backup_path%\%backup_name%.sql"

if %ERRORLEVEL% neq 0 (
    echo Backup failed: error during dump creation >> "%backup_path%\mysql_backup_log.txt"
) else (
    echo Backup successful >> "%backup_path%\mysql_backup_log.txt"
)
