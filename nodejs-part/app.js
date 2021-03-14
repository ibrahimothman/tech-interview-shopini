const dotenv = require('dotenv')
dotenv.config()

const express = require('express')

const app = express()
const LoginController = require('./Controllers/LoginController')

app.use(express.json())

// routes
app.post('/login', (req, res) => {
    LoginController.login(req, res);
})


app.listen(3000, () => console.log('server starts'))

