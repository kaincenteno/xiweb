function vanadielClock()
{
    const VANA_EPOCH = 1009810800
    const VANA_YEAR  = 518400
    const VANA_MONTH = 43200
    const VANA_DAY   = 1440
    const VANA_HOUR  = 60

    let vanadielNow = (Date.now() / 1000) - VANA_EPOCH
    // Total elapsed vanadiel minutes ever
    let vanaTimestamp = (vanadielNow / 60.0 * 25) + 886 * VANA_YEAR

    return {
        "year": Math.trunc(vanaTimestamp / VANA_YEAR),
        "month": Math.trunc(((vanaTimestamp / VANA_MONTH) % 12) + 1),
        "day": Math.trunc(((vanaTimestamp / VANA_DAY) % 30) + 1),
        "hour": Math.trunc(Math.trunc(vanaTimestamp % VANA_DAY) / VANA_HOUR),
        "minute": Math.trunc(vanaTimestamp % VANA_HOUR),
        "vana_now": vanadielNow,
        "vana_timestamp": vanaTimestamp
    }
}

let vanatime = vanadielClock();

let h3 = document.querySelector(".vanadielTime")
h3.textContent = `Vana'diel time is now: ${vanatime['year']}/${String(vanatime['month']).padStart(2, "0")}/${String(vanatime['day']).padStart(2, "0")} - ${String(vanatime['hour']).padStart(2, "0")}:${String(vanatime['minute']).padStart(2, "0")}`

setInterval(function () {
    let vanatime = vanadielClock();

    let h3 = document.querySelector(".vanadielTime")
    h3.textContent = `Vana'diel time is now: ${vanatime['year']}/${String(vanatime['month']).padStart(2, "0")}/${String(vanatime['day']).padStart(2, "0")} - ${String(vanatime['hour']).padStart(2, "0")}:${String(vanatime['minute']).padStart(2, "0")}`

}, 2400)

