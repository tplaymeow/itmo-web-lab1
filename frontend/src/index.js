import * as extractor from './Extractor'
import * as api from './Networking'
import $ from 'jquery'

$(document).ready(function(){    
    $("#check-butoon").click(function (e) { 
        onCheckClicked()
    });
});

function onCheckClicked() {
    const x = extractor.extractX();
    const y = extractor.extractY();
    const r = extractor.extractR();

    if (x == null || y == null || r == null) {
        console.log(x, y, r)
        return
    }

    const coordinatesModels = r.map(r => {
        return { x: x, y: y, r: r }
    })

    api.checkCoodinates(coordinatesModels[0]).then(
        res => {
            console.log(res)
        },
        err => {
            console.log(err)
        }
    )
}