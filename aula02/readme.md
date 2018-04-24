## Instalando Bancos
```
sudo apt update
sudo apt install postgresql
```
## Instalando pacotes PHP
```
sudo apt install php7.0-mysql
sudo apt install php7.0-pgsql
```

## Restartar o apache2
```
sudo service apache2 restart
```

### PostgreSQL
Logando no postgres
```
sudo su
su postgres
psql
```
Criar banco de dados e nosso usuário
```
CREATE DATABASE aula;
CREATE USER lucas PASSWORD '123';
ALTER DATABASE aula OWNER TO lucas;
```
Saindo do super usuario
```
\q
exit
exit
```
Logando com nosso usuario
```
psql -h localhost -U lucas -d aula
``` 
Criando tabela users
```
CREATE TABLE users(
	id SERIAL PRIMARY KEY,
	name VARCHAR(200) NOT NULL,
	email VARCHAR(150) NOT NULL UNIQUE,
	pass VARCHAR(200) NOT NULL
);
```
### MySQL
Logando no Mysql
```
sudo su
mysql
```
Criar banco de dados e nosso usuário
```
CREATE DATABASE aula;
CREATE USER 'lucas'@'localhost' IDENTIFIED BY '@da4linux';
GRANT ALL PRIVILEGES ON aula.* TO 'lucas'@'localhost'
```
Saindo do super usuario
```
exit
exit
```
Logando com o nosso usuario
```
mysql -h localhost -b aula -u lucas -p
```
Criando tabela users
```
CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(200) NOT NULL,
	email VARCHAR(150) NOT NULL UNIQUE,
	pass VARCHAR(200) NOT NULL
);
```