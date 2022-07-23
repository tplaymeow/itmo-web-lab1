
export function float(rawValue) {
    if (isNaN(rawValue)) return NaN
    return parseFloat(rawValue)
}

export function int(rawValue) {
    const floatValue = float(rawValue)
    if (isNaN(floatValue) || !Number.isInteger(floatValue)) return NaN
    return parseInt(floatValue)
}