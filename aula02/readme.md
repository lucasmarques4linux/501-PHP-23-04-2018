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