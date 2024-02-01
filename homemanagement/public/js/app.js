$('document').ready(function () {

  // Start Left Side Bar
  $('.sidebarlinks').click(function () {
    $('.sidebarlinks').removeClass('currents');
    $(this).addClass('currents');

    // End Left Side Bar
  });
});



const getsitesetting = document.getElementById('sitesettings');
getsitesetting.addEventListener('click',function(){
  document.body.classList.toggle('show-nav');
})

// Start Js Area

/* Start Top Navbar  */

/* start notify & userlogout  */
//  start dropdown
function dropbtn(e) {
  // console.log(e.target);
  e.target.parentElement.nextElementSibling.classList.toggle('show');
}
// end dropdown
/* end notify & userlogout  */


//  Start Gauge Area 

var gaugeurs = new JustGage({
  id: "gaugeusers", // the id of the html element
  width:200,
  height:200,
  value: 50,
  min: 0,
  max: 70,
  gaugeWidthScale: 0.6
});

var gaugecus = new JustGage({
  id: "gaugecustomers", // the id of the html element
  width:200,
  height:200,
  value: 50,
  min: 0,
  max: 70,
  gaugeWidthScale: 0.6
});

var gaugeemps = new JustGage({
  id: "gaugeemployees", // the id of the html element
  width:200,
  height:200,
  value: 50,
  min: 0,
  max: 70,
  gaugeWidthScale: 0.6
});

var gaugeinvs = new JustGage({
  id: "gaugeinvesters", // the id of the html element
  width:200,
  height:200,
  value: 50,
  min: 0,
  max: 70,
  gaugeWidthScale: 0.6
});

// update the value randomly
setInterval(() => {
  gaugeurs.refresh(Math.random() * 100);
  gaugecus.refresh(Math.random() * 100);
  gaugeemps.refresh(Math.random() * 100);
  gaugeinvs.refresh(Math.random() * 100);
}, 5000)


//  End Gauge Area 


/* End Top Navbar  */

// Start Expense Area
const ctx = document.getElementById("mypiechart");
ctx.height = 250;
new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      data: [12, 19, 3],
    }]
  },
  options: {
    responsive: false
  }
});
// End Expense Area

// Start Earning Area
google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Sales', 'Expenses'],
    ['2004', 1000, 400],
    ['2005', 1170, 460],
    ['2006', 660, 1120],
    ['2007', 1030, 540]
  ]);

  var options = {
    title: 'Sales Performance',
    curveType: 'function',
    legend: { position: 'bottom' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

  chart.draw(data, options);

}
// End Earning Area

// End Js Area


// let result = Math.min(10,20,5,6,8,2,60,18,7);
// console.log(result);
// let results = Math.max(10,20,5,6,8,2,60,18,7);
// console.log(results);

// -------------------------------------------

// Get Minimum Number
// var arrnums = [5,10,15,3,7,8,20,6];


// function getminnumber(numbers){

//    let minnumber = numbers[0]; //5

//    for(var x=0; x<numbers.length; x++){
//       // Get Mini Number
//       // if(numbers[x] < minnumber){
//       //    minnumber = numbers[x]; //3
//       // }

//       // Get Max Number
//       if(numbers[x] > minnumber){
//         minnumber = numbers[x]; //20
//       }
//    }

//    return minnumber;
// }

// console.log(getminnumber(arrnums));

// -------------------------------------------


// var arrnumstwo = [5,10,15,3,7,8,20,6];

// function sortmaxtominnum(numbers){

//    for(let y=0; y<numbers.length; y++){
//     let maxnumber = numbers[y];
//     let curidx = y;

//     for(let x=y; x<numbers.length; x++){ 

//       //  Get Max Number
//       if(numbers[x] > maxnumber){
//         maxnumber = numbers[x];
//         curidx = x;
//       }

//       //  Get Min Number
//       // if(numbers[x] < maxnumber){
//       //   maxnumber = numbers[x];
//       //   curidx = x;
//       // }
//     }

//     // return maxnumber; //20
//     // return [maxnumber,curidx]; //[20,6]

//     // swap idx6 to idx0 value
//     // numbers[curidx] = numbers[0]; //5
//     // // return [maxnumber,curidx,numbers]; // 20 6 [5,10,15,3,7,8,5,6];
//     // // swap idx0 to idx6 value
//     // numbers[0] = maxnumber; //20
//     // return [maxnumber,curidx,numbers]; // 20 6 [20,10,15,3,7,8,5,6];

//     numbers[curidx] = numbers[y]; 
//     numbers[y] = maxnumber; 

//    }

//     return numbers;
// }

// console.log(sortmaxtominnum(arrnumstwo));

// -------------------------------------------


//  Start Project Status Area 
let saledatas = [
  {
    title: "Order Value",
    rank: 80,
    value: "120.8%",
    color: "bg-secondary"
  },
  {
    title: "Total Products",
    rank: 50,
    value: "325.2%",
    color: "bg-success"
  },
  {
    title: "Quantity",
    rank: 70,
    value: "25.60%",
    color: "bg-warning"
  },
  {
    title: "New SKU",
    rank: 43,
    value: "13.34%",
    color: "bg-info"
  },
  {
    title: "Dept",
    rank: 10,
    value: "3.40%",
    color: "bg-danger"
  },
];

var sortingclick = document.querySelector('.sortingclicks');

function sortingmaxtomin(saledatas) {

  for (let y = 0; y < saledatas.length; y++) {
    let maxnumber = saledatas[y];
    let curidx = y;

    for (let x = y; x < saledatas.length; x++) {

      //  Get Max Number
      if (saledatas[x].rank > maxnumber.rank) {
        maxnumber = saledatas[x];
        curidx = x;
      }

    }


    saledatas[curidx] = saledatas[y];
    saledatas[y] = maxnumber;

  }

  return saledatas;
}

function sortingmintomax(saledatas) {

  for (let y = 0; y < saledatas.length; y++) {
    let minnumber = saledatas[y];
    let curidx = y;

    for (let x = y; x < saledatas.length; x++) {

      //  Get Max Number
      if (saledatas[x].rank < minnumber.rank) {
        minnumber = saledatas[x];
        curidx = x;
      }

    }


    saledatas[curidx] = saledatas[y];
    saledatas[y] = minnumber;

  }

  return saledatas;
}


function showsaledatas(sortdatas) {
  let getsalescnt = document.getElementById('salescontainer');

  let progress = `<div>`;

  for (let x = 0; x < sortdatas.length; x++) {
    progress += `
      <div class="mt-2">
         <div class="d-flex justify-content-between">
           <small${sortdatas[x].title}></small>
           <small>${sortdatas[x].value}</small>
         </div>
        <div class="progress">
          <div class="progress-bar ${sortdatas[x].color}" style="width:${sortdatas[x].rank}%;" aria-valuenow="${sortdatas[x].rank}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
        `;
  }

  progress += `</div>`;

  getsalescnt.innerHTML = progress;
}

window.onload = function () {
  let sortdatas = sortingmintomax(saledatas);
  showsaledatas(sortdatas);
}




const getyear = document.getElementById('getyear');
const getfullyear = new Date().getFullYear();
getyear.textContent = getfullyear;


sortingclick.addEventListener('click', function (e) {
  let sortdatas;
  if (e.target.classList.contains('sortmaxtomins')) {
    sortdatas = sortingmaxtomin(saledatas);
    showsaledatas(sortdatas);
  } else {
    sortdatas = sortingmintomax(saledatas);
    showsaledatas(sortdatas);
  }
})






//  End Project Status Area 