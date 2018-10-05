comment=$1
git add *;git commit -m "$comment"; git push;git push heroku master;heroku open;