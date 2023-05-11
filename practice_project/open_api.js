function getToday() {
    const date = new Date();
    const hour = date.getHours();
    let getDay = date.getDate();
    if(hour < 10) {
        getDay = getDay -1;
    }
    const year = date.getFullYear();
    const month = ("0"+(1+date.getMonth())).slice(-2);
    const day = ("0" + getDay).slice(-2)-1;
    console.log(hour)
    console.log(getDay);
    return `${year}${month}${day}`;
}
const url = ``;

fetch(url)
    .then(res => res.json())
	.then(myJson => {
        const obj = myJson["boxOfficeResult"];
        const dbox = obj["dailyBoxOfficeList"]
        console.log(dbox);
    })