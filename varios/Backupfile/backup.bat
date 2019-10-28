@echo off
cd /
For /f "tokens=1-3 delims=/ " %%a in ('date /t') do (set mydate=%%c-%%b-%%a)
For /f "tokens=1-2 delims=/: " %%a in ("%TIME%") do (if %%a LSS 10 (set mytime=0%%a-%%b) 
	if %%a GEQ 10 (set mytime=%%a-%%b))
cd \xampp-7.1.8\mysql\bin
mysqldump.exe -uroot -pdiplan@mysql --port=3306 sakila > D:\BackupDB\sakila_%mydate%_%mytime%.sql
timeout /t 10
