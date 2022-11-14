FROM php:7.4-cli
COPY ./ /usr/src/todo
WORKDIR /usr/src/todo
CMD [ "php", "./index.php" ]
