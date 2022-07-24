const superagent = require('superagent');

export async function checkCoodinates(coordinates) {
    try {
        const res = await superagent.post(process.env.API).send(coordinates)
        return res.body
    }
    catch(err) {
        const errorObj = JSON.parse(err.response.text)
        throw errorObj.error ?? "Неизвестная ошибка"
    }
}