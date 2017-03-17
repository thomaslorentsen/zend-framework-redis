all:
	docker stop php-redis
	docker rm php-redis
	docker rmi php-redis
	docker build -t php-redis .
	docker run -p 8080:80 -d --name php-redis php-redis
