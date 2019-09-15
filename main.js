import {CompleteMedList} from './MedList.js'
var cycleStart;
var cycleTypeId;
var cycleType;
var medList = [];
var uSDate;
var medStartDay = [];
var medCycleLength = [];
var yourMedDeets = [];

const currentCycleButton = document.querySelector('.currentCycle');
currentCycleButton.addEventListener('click', openCurrentCycle, false);

const newCycleButton = document.querySelector('.newCycle');
newCycleButton.addEventListener('click', openCycleForm, false);

const saveForm1 = document.querySelector('.saveForm1');
saveForm1.addEventListener('click', openCycleFormPg2, false);

const saveForm2 = document.querySelector('.saveForm2');
saveForm2.addEventListener('click', closeCycleForm, false);

const goToMain = document.querySelector('.toMain');
goToMain.addEventListener('click', closeCurrentCycle, false);

const goToMain2 = document.querySelector('.toMain2');
goToMain2.addEventListener('click', closeMedDeets, false);

const goToMeds = document.querySelector('.toMedDeets');
goToMeds.addEventListener('click', openMedDeets, false);

const currentCycle2 = document.querySelector('.currentCycle2');
currentCycle2.addEventListener('click', openCurrentCycle, false);

function openCurrentCycle() {
    document.getElementById("currentCycle").style.width = "100%";
    document.getElementById("medDeets").style.width = "0%";
    document.getElementById("currentCycleData").innerHTML = null;  
    if (cycleStart == null){
        cycleStart = "No start date entered";
    }
    if (cycleType == null){
        cycleType = "No cycle type selected";
    }
    if (uSDate == null){
        uSDate = "No ultrasounds scheduled";
    }


    document.getElementById("currentCycleData").innerHTML += "<br><h2>Cycle Goal: </h2>" + cycleType + "<br>" +
    "<h2>Cycle Start Date: </h2>" + cycleStart + "<br><h2>Ultrasound Date: </h2>" + uSDate + 
    "<br><h2>Medications: </h2>";
    for (var i=0; i < medList.length; i++) {
        document.getElementById("currentCycleData").innerHTML += medList[i] + " starting cycle day " +
        medStartDay[i] + " for " + medCycleLength[i] + " days. <br>";
    }
}

function openCycleForm() {
    document.getElementById("newCyclePg1").style.width = "100%";
    //clear the form, div and global vars so info isn't duplicated
    document.getElementById("fullMedsList").innerHTML = null;
    cycleStart;
    cycleType;
    medList = [];
    uSDate;
    medStartDay = [];
    medCycleLength = [];
    yourMedDeets = [];
    document.getElementById("firstForm").reset();

    for (var i=0; i < CompleteMedList.length; i++){
        document.getElementById("fullMedsList").innerHTML += 
        "<input type=\"checkbox\" name=\"meds\" id=\"" + CompleteMedList[i].id + "\">" +
        CompleteMedList[i].name + "<br>";
    }
}

function openCycleFormPg2() {
    document.getElementById("newCyclePg2").style.width = "100%";
    document.getElementById("newCyclePg1").style.width = "0%";
    var start = document.forms[0];
    cycleStart = start[0].value;
    
    document.getElementById("enterUltrasound").innerHTML = null;
    document.getElementById("newMedList1").innerHTML = null;
    document.getElementById("newMedList2").innerHTML = null;

    var cycle = document.forms[0];
    for (var i = 1; i < 6; i++){
        if (cycle[i].checked){
            cycleType = cycle[i].value;
            cycleTypeId = cycle[i].id;
        }
    }
            
    var meds = document.forms[0];
    for (var i = 6; i < meds.length; i++){
        if (meds[i].checked){
            medList.push(meds[i].id);
            yourMedDeets.push(CompleteMedList[i-6]);
        }
        
    }
    console.log(yourMedDeets);
    if (cycleTypeId != "medTI"){
        document.getElementById("enterUltrasound").innerHTML += "<h2>Ultrasound Date</h2>" + 
        "Enter the ultrasound date <input type=\"date\" id=\"uSDate\"><br><br>";
    }

    for (var i = 0; i < medList.length; i++) {
        document.getElementById("newMedList1").innerHTML += "Medication: " + medList[i] + "<br><br>" + 
        "Day of Cycle: <input type=\"number\" name=\"medStart\"><br><br>";
    }
    for (var i = 0; i < medList.length; i++) {
        document.getElementById("newMedList2").innerHTML += "Medication: " + medList[i] + "<br><br>" + 
        "Days Taken: <input type=\"number\" name=\"medLength\"><br><br>";
    }
}
       
function closeCurrentCycle() {
    document.getElementById("currentCycle").style.width = "0%"; 
}

function closeMedDeets() {
    document.getElementById("medDeets").style.width = "0%"; 
}

function openMedDeets() {
    document.getElementById("currentCycle").style.width = "0%"; 
    document.getElementById("medDeets").style.width = "100%";
    

    //make sure the meds list isn't empty
    if (medList === undefined || medList.length == 0) {
        document.getElementById("allMedDeets").innerHTML = null;
        document.getElementById("allMedDeets").innerHTML = "No medications have been selected <br>";
    }
    else {
        for (var i = 0; i < medList.length; i++){
            document.getElementById("allMedDeets").innerHTML += 
            "<br> <h2>Medication: " + yourMedDeets[i].name + "</h2> " +
            "<h3>Unit of Measurement: </h3>" + yourMedDeets[i].unit +
            "<br> <h3>Directions: </h3>" + yourMedDeets[i].directions +
            "<br> <h3>Time Taken: </h3>" + yourMedDeets[i].timeTaken +
            "<br> <h3>Common Side Effects: </h3>" + yourMedDeets[i].sideEffects +
            "<br> <h3>Other Names: </h3>" + yourMedDeets[i].otherNames + "<br>";
        }
    }
}

function closeCycleForm() {
    document.getElementById("newCyclePg2").style.width = "0%";

    //Check to see if the cycle is monitored, then put all the input into variables
    if (cycleType != "Medication & Timed Intercourse (Not Monitored)"){
        //ultrasound date
        var uSound = document.forms[1];
        uSDate = uSound[0].value;
        
        //meds start day
        var startD = document.forms[1]
        for (var i = 1; i <= medList.length; i++){
            medStartDay[i-1] = startD[i].value;
        }
        //how many days the med is taken
        var medsL = document.forms[2]
        for (var i = 0; i < medList.length; i++){         
            medCycleLength[i] = medsL[i].value;
        }
    }
    console.log(medList, uSDate, cycleStart, cycleType, medCycleLength, medStartDay);
} 
        