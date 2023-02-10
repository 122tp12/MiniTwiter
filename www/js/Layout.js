function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = AddZero(today.getMinutes());
    let s = AddZero(today.getSeconds());
    document.getElementById('clock').innerHTML =  h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
}

function AddZero(i) {
    if (i < 10) {i = "0" + i};
    return i;
}