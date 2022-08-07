
const localStorageResultsKey = "coordinates_results_2"

export function save(item) {
    const array = readAll() ?? []
    const extendedArray = array.concat([item])
    const newString = JSON.stringify(extendedArray)
    localStorage.setItem(localStorageResultsKey, newString)
}

export function readAll() {
    const string = localStorage.getItem(localStorageResultsKey)
    return JSON.parse(string)
}

export function clear() {
    localStorage.clear()
}
