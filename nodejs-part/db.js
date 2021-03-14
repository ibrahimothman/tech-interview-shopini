const mysql = require('mysql')
const dbConnection = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE_NAME,
    port: 3307,
})

dbConnection.connect(err => {
    if(err) console.log(err);
    else console.log('connected to DB');
})

module.exports = dbConnection