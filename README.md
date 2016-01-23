# lmsserver3
lmsserver3 old platform old product

php nginx config
php.ini max_execution_time = 3000
nginx     location / {
        proxy_read_timeout 3000;
        try_files $uri $uri/ /index.php?$query_string;
    }
    
new view 
