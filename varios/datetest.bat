@echo off
cd /
For /f "tokens=1-3 delims=/ " %%a in ('date /t') do (set mydate=%%c-%%b-%%a)
For /f "tokens=1-2 delims=/: " %%a in ("%TIME%") do (if %%a LSS 10 (set mytime=0%%a-%%b) 
	if %%a GEQ 10 (set mytime=%%a-%%b))
cd C:\xampp\mysql\bin
mysqldump.exe -uadmin -padminsistemas@1234 --port=3307 estratificacion > D:\Copias Aplicativos Planeacion\backups_sies\siesbackup_%mydate%_%mytime%.sql
mysqldump.exe -uadmin -padminsistemas@1234 --port=3307 sitesigo > D:\Copias Aplicativos Planeacion\backups_sitesigo\sitesigo_%mydate%_%mytime%.sql
timeout /t 10