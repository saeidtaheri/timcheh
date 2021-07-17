# Timcheh
My demo for backend developer position

## Requirements
- Docker
- Docker Compose
- Git
- Bash
- Make

## Installation
Add ```127.0.0.1 timcheh.local``` to ```/etc/hosts``` file and then run the below commands
```
git clone git@github.com:saeidtaheri/timcheh.git timcheh && cd timcheh
mv .env.example .env
rm -rf .git
make up
```
Now open ```timcheh.local``` in browser

### Shell Access
To access the php container as a root user:
```
make root
```

To access the php container as a normal user:
```
make shell
```
