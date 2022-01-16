function dateTimes() {
    var salutation = document.querySelector("#salutation");
    var time = document.querySelector("time");
    date = new Date();
    [day, numDay, month, year] = [date.getDay(), date.getUTCDate(), date.getMonth(), date.getFullYear()];
    [hours, minutes, seconds] = [date.getHours(), date.getMinutes(), date.getSeconds()];

    switch (day) {
        case 0: libDay = "dimanche"; break;
        case 1: libDay = "lundi"; break;
        case 2: libDay = "mardi"; break;
        case 3: libDay = "mercredi"; break;
        case 4: libDay = "jeudi"; break;
        case 5: libDay = "vendredi"; break;
        case 6: libDay = "samedi"; break;
    }

    switch (month) {
        case 0: libMonth = "janvier"; break;
        case 1: libMonth = "février"; break;
        case 2: libMonth = "mars"; break;
        case 3: libMonth = "avril"; break;
        case 4: libMonth = "mai"; break;
        case 5: libMonth = "juin"; break;
        case 6: libMonth = "juillet"; break;
        case 7: libMonth = "Aout"; break;
        case 8: libMonth = "septembre"; break;
        case 9: libMonth = "octobre"; break;
        case 10: libMonth = "novembre"; break;
        case 11: libMonth = "décembre"; break;
    }
    if (hours <= 11) {
        salutation.innerHTML = "bonjour";
    }
    else if (hours <= 15) {
        salutation.innerHTML = "bonne après midi ";
    }
    else if (hours > 15) {
        salutation.innerHTML = "bonsoir ";
    }

    time.innerHTML = `${libDay} le ${numDay} ${libMonth} ${year} ${hours}:${minutes}:${seconds}`;
}