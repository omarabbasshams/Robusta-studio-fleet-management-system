##instructions  to run the project 

##install packages

##composer install 
##npm install 

##make virtual host 
##nano /etc/apache2/sites-available/bus.com.conf



##sudo a2ensite bus.com.conf

##nano /etc/hosts

##add ::1 bus.com

##sudo systemctl restart apache2

## edit data in .env

##edit url 
##database name user password

##php artisan migrate
##composer install passport
##php artisan db:seed

##########################

##use passport for auth acces token for api and basic auth with session for web
##use spatie role for authrization
##use adminlte for backend veiws

##API'S

##url/api/Login take email password 
##url/api/register take name email password password_confirmation
##url/api/getAvilable get all available seats in trips and from which station
##url/api/reserve take seat_id from_station_id to_station_id trip_id
##url/api/isAvilable take  from_station_id to_station_id trip_id  if it available reserve this seat 







