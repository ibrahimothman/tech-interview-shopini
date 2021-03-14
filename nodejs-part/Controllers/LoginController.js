const dbConnection = require('../db')
const bcrypt = require('bcrypt')

exports.login = async (req, res) => {
 const { email, password } = req.body
 dbConnection.query('SELECT * FROM users where email=?',
 [email],async (err, results, fields) => {
    if (err || results.length == 0) {
        res.status(400).json({
            code: 400,
            message: 'email or password is wrong'
        })
    } else {
        if (results.length > 0) {
            const isPasswordMatch = bcrypt.compare(
                password,
                results[0].password
            )
            if (isPasswordMatch) {
                res.json({
                    code: 200,
                    message: 'logged in'
                })
            } else {
                res.status(400).json({
                    code: 400,
                    message: 'Email or password is wrong'
                })
            }
        }
    }
 })
}