import $ from 'jquery'

export function updateResult(message) {
    $("#result").text(message)
}

export function updateResults(items) {
    if (items === null || items.length == 0) {
        $("#results-container").parent().hide()
        return
    }

    const headerHTML = "<th>X</th><th>Y</th><th>R</th><th>Результат</th>"
    const dataHTML = items.map(item => {
        return `<td>${ item.x }</td>
                <td>${ item.y }</td>
                <td>${ item.r }</td>
                <td>${ item.result ? "Попадание" : "Промах" }</td>`
    })

    const table = document.createElement("table")

    const headerRow = document.createElement("tr")
    headerRow.innerHTML = headerHTML
    table.appendChild(headerRow)

    dataHTML.forEach(element => {
        const row = document.createElement("tr")
        row.innerHTML = element
        table.appendChild(row)
    })

    $("#results-container")
        .html(table.outerHTML)
        .parent()
        .show()
}
