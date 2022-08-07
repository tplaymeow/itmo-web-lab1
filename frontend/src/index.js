import * as extractor from './Extractor'
import * as validator from './Validator'
import * as drawer from './Drawer'
import * as store from './Store'
import * as api from './Networking'
import $ from 'jquery'

$(function() {
    drawer.updateResults(store.readAll())

    $("#check-button").on("click", function (e) {
        onCheckClicked()
    })

    $("#clear-button").on("click", function (e) {
        store.clear()
        drawer.updateResults(store.readAll())
    })
})

function onCheckClicked() {
    const x = extractor.extractX();
    const y = extractor.extractY();
    const r = extractor.extractR();

    if (x == null || y == null || r == null || !validator.validateY(y)) {
        var message = "Неверное значение для полей:"
        if (x == null) { message += " X" }
        if (y == null || !validator.validateY(y)) { message += " Y" }
        if (r == null) { message += " R" }
        drawer.updateResult(message)
        return
    }

    const coordinatesModels = r.map(r => {
        return { x: x, y: y, r: r }
    })

    api.checkCoodinates(coordinatesModels[0]).then(
        res => {
            store.save(res)
            drawer.updateResults(store.readAll())
            console.log(res)
        },
        err => {
            drawer.updateResult(err)
        }
    )
}