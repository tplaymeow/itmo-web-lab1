import $ from 'jquery'
import * as parser from './Parser'

export function extractX() {
    const rawValue = $("#x-input option:selected").val()
    const intValue = parser.int(rawValue)
    return isNaN(intValue) ? null : intValue

}

export function extractY() {
    const rawValue = $("#y-input").val()
    const floatValue = parser.float(rawValue)
    return isNaN(floatValue) ? null : floatValue
}

export function extractR() {
    var values = []
    if ($("#r-input-1_0").is(":checked")) values.push(1.0)
    if ($("#r-input-1_5").is(":checked")) values.push(1.5)
    if ($("#r-input-2_0").is(":checked")) values.push(2.0)
    if ($("#r-input-2_5").is(":checked")) values.push(2.5)
    if ($("#r-input-3_0").is(":checked")) values.push(3.0)
    return values.length > 0 ? values : null
}
