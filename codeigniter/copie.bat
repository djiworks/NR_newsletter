del /S /Q C:\wamp\ci_application
del /S /Q C:\wamp\ci_system
del /S /Q C:\wamp\www
xcopy /E /Y  ci_application C:\wamp\ci_application
xcopy /E /Y  ci_system C:\wamp\ci_system
xcopy /E /Y  www C:\wamp\www
PAUSE
