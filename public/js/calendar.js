// Load application styles

// ================================
// START YOUR APP HERE
// ================================

var now = new Date();
var monthArr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var dayArr = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
var yearNow = now.getFullYear();
var monNow = now.getMonth();
var dateNow = now.getDate();
const $dateDisplay = document.getElementById('date-display');
const $dayDisplay = document.getElementById('day-display');
var time;
const $dayCols = document.querySelectorAll('#day-number-box .day');
const DATA = [];
var clickedTime = new Date();

/*btn*/
var $totalBtns = document.querySelectorAll('.additional-btn');
var $todoListWindow = document.getElementById('todo-list-window');
var $todoWindowBtns = document.querySelectorAll('.todo-window-btn');
var $calandarBtn = document.getElementById('calandar-btn');

var $monthYearDisplay = document.getElementById('month-year-display');
$monthYearDisplay.textContent = `${monthArr[now.getMonth()]} ${now.getFullYear()}`;

window.onload = function() {
    $dateDisplay.textContent = `${now.getDate()}`;
    $dayDisplay.textContent = `${dayArr[now.getDay()].toUpperCase()}`;
    resetAll();
    $calandarBtn.classList.add('btn-click-color');
};

spreadDate(0, 0);

var day;
function spreadDate(left, right){
    var keepGoing = 1;
    time = new Date(yearNow, monNow + left + right, 1);
    $monthYearDisplay.textContent = `${monthArr[time.getMonth()]} ${time.getFullYear()}`;

    var lastDate = new Date(yearNow, monNow + 1 + left + right, 0);
    day = time.getDay() + 1;
     
    $dayCols.forEach(function($el){
        var $p = $el.querySelector('p');
        $p.textContent = '';
        $el.dataset.id = '';
        $el.classList.remove('blur');
    });
    
    for(var i = 1; keepGoing; day++, i++){
        var $dayCol = document.querySelector(`#day-number-box .day:nth-of-type(${day})`);
        $dayCol.querySelector('p').textContent = `${i}`;
        $dayCol.dataset.id = `cal-${time.getFullYear()}-${time.getMonth() + 1}-${i}`;
        if(i >= lastDate.getDate()){
            keepGoing = 0;
        };
    };

    /* Today's date is red-highlited */

    var $todayCol = document.querySelector(`[data-id="cal-${now.getFullYear()}-${now.getMonth() + 1}-${now.getDate()}"]`);
    if(yearNow === time.getFullYear() && monNow === time.getMonth()){
        $todayCol.querySelector('p').classList.add('mark');
    }else{
        $dayCols.forEach(function($dayCol){
            $dayCol.querySelector('p').classList.remove('mark');
        });
    };

    /* Reset showing-dot settting */
    if(0 !== DATA.filter(a => a.yearMonth === `${time.getFullYear()}-${time.getMonth() + 1}`).length){  
        var theDataArr = DATA.filter(a => a.yearMonth === `${time.getFullYear()}-${time.getMonth() + 1}`);
        for(var q = 0; q < theDataArr.length; q++){
            var $theDays = document.querySelectorAll(`[data-id="cal-${theDataArr[q].date}"]`);
            $theDays.forEach(function($theDay){
                $dot = $theDay.children[1];
                $dot.src = 'https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895688_o.png'
            });
        };
    }else{
        var $dots = document.querySelectorAll('#day-number-box #dot');
        $dots.forEach(function($dot){
            $dot.src = '';
        });
    };
}


/* Calender Arrow */

const $leftArrow = document.getElementById('left-arrow');
const $rightArrow = document.getElementById('right-arrow');
var minus = 0;
var plus = 0
$leftArrow.addEventListener('click', () => {
        minus -= 1;
        spreadDate(minus, plus);
    }
);
$rightArrow.addEventListener('click', () => {
        plus += 1;
        spreadDate(minus, plus);
    }
);


/* Connecting Calender with Todo */

var $input;
var $lastLi = document.getElementById('lastLi');
var $ul = document.querySelector('#todo-box ul');
var todoContext;
var dateIndex;
var $recreateLi;
var dayAll = document.querySelectorAll('#day-number-box .day');

/* Mark and Blur After a click */
$dayCols.forEach(function($el){
    $el.addEventListener('click', (event) => {
        document.getElementById('calendar-left-box').classList.remove('display-none');
        document.getElementById('todo-list-window').classList.remove('display-block');
        $totalBtns.forEach(($totalBtn) => {$totalBtn.classList.remove('btn-click-color')});
        $calandarBtn.classList.add('btn-click-color');

        dayAll.forEach(($day)=>{
            $day.classList.remove('blur');
        });
        event.currentTarget.classList.add('blur');
        dateIndex = Number($el.querySelector('p').innerHTML);
        $dateDisplay.textContent = dateIndex;
        
        clickedTime = new Date(time.getFullYear(), time.getMonth(), dateIndex);
        $dayDisplay.textContent = dayArr[clickedTime.getDay()].toUpperCase();
        if(!dateIndex){
            $dayDisplay.textContent = '';
        };
		
		currentDateTmp = new Date();
		currentDateTmp.setHours(0,0,0,0);
		
		if (clickedTime >= currentDateTmp) {
			$('#todo-box').show();
		} else {
			$('#todo-box').hide();
		}
		
        if(clickedTime.getFullYear() === yearNow && clickedTime.getMonth() === monNow && clickedTime.getDate() === dateNow){
            listNum;
        }else{
            listNum = 0;
        };

        resetAll();
        $lastLi = document.getElementById('lastLi')
        var findArr = DATA.filter(a => a.date === `${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}-${clickedTime.getDate()}`);
        
        if(!!findArr.length){
            for(var j = 0; j < findArr.length; j++){
                $recreateLi = $lastLi.cloneNode(true);
                $ul.insertBefore($recreateLi, $lastLi);
                $recreateLi.classList.add('list-show');
                $recreateLi.children[1].textContent = findArr[j].content;
                btnReset($recreateLi);
            };
        };
    });
});

var $newLi;
var $checkCircle;
var $deleteBtn;
var $newLiText;
var todoListData;
var listNum = 0;
var listTarget;
var $dot;

function MakeDatalist(){
    this.date = `${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}-${clickedTime.getDate()}`
    this.yearMonth = `${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}`;
    this.id = '',
    this.content = '',
    this.status = 'unfinished'
}

function resetAll(){
    var token=$('meta[name="csrf-token"]').attr('content');
    var action=document.location;
    var input_ThisDate = `${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}-${clickedTime.getDate()}`;
    $ul.innerHTML = '<form id="avaliabiltyForm" action="'+ action+'" method="post"><input type="hidden" name="_token" id="csrf-token" value="'+token +'"><a class="new-time" onclick="addEvent()"><i onclick="addEvent()" class="fas fa-plus"></i>New</a><div class="cart-event first-item"><i onclick="removeFirst()" class="fas fa-trash"></i><label class="lab-cal">From: </label><label class="lab-cal">To: </label><br><i class="fas fa-calendar-alt"></i><input name="from[]" required id="inp-from" class="inp-time" type="time" placeholder="0.00 am"> <input id="inp-ThisDate" name="date" value="'+ input_ThisDate+'" type="hidden"><i class="fas fa-calendar-alt"></i><input required name="to[]" class="inp-time" type="time" placeholder="0.00 am"></div><div id="new_chq"></div><input type="hidden" value="1" id="total_chq"><button id="submitFrom" type="submit" class="btn-saved">Save</button><br><select class="custom-select mySelect" style="width: 120px; font-size: 16px; display: none;" multiple><option value="12:00 am">12:00 am</option><option value="2">12:30 am</option><option value="3">12:00 am</option><option value="4">1:00 am</option><option value="4">2:00 am</option><option value="4">3:00 am</option><option value="4">4:00 am</option><option value="4">5:00 am</option></select><select class="custom-select" style="width: 120px; margin: 15px; font-size: 16px; display: none;" multiple=""><option value="12:00 am">12:00 am</option><option value="2">12:30 am</option><option value="3">12:00 am</option><option value="4">1:00 am</option><option value="4">2:00 am</option><option value="4">3:00 am</option><option value="4">4:00 am</option><option value="4">5:00 am</option></select>   </form>';
    
   
    
    
    $input= document.querySelector('#li1 input');
    $lastLi = document.getElementById('lastLi');
    $input.addEventListener('keypress', function(event){
        if(event.key === 'Enter'){
            $newLi = $lastLi.cloneNode(true);
            $ul.insertBefore($newLi, $lastLi);
            $newLi.classList.add('list-show');
            todoContext = $input.value;

            $newLiText = $newLi.children[1];
            $newLiText.textContent = todoContext;
            $input.value = '';
            $checkCircle = $newLi.children[0];
            $deleteBtn = $newLi.children[2];

            btnReset($newLi);

            todoListData = new MakeDatalist();
            todoListData.id = `${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}-${clickedTime.getDate()}-${listNum}`;
            todoListData.content = todoContext;
            DATA.push(todoListData);
            $newLi.dataset.id = todoListData.id;
            $newLi.dataset.date = todoListData.date;
    
            listNum += 1;
        
            if(!!DATA.filter(a => a.date === `${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}-${clickedTime.getDate()}`).length){
                var $theDays = document.querySelectorAll(`[data-id="cal-${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}-${clickedTime.getDate()}"]`);
                $theDays.forEach(function($theDay){
                    var $dot = $theDay.children[1];
                    $dot.src = 'https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895688_o.png';
                });
            };
        };
    });   
}
    function removeFirst(){
        $(".first-item").remove();
    }
    function addEvent() {
                var new_chq_no = parseInt($('#total_chq').val()) + 1;
                
                var new_input = "<div id='new_" + new_chq_no + "' class='cart-event'><i onclick='removeEvent()' class='fas fa-trash'></i><label class='lab-cal'>From: </label><label class='lab-cal'>To: </label><br><i class='fas fa-calendar-alt'></i><input required name='from[]' id='inp-from' class='inp-time' type='time' placeholder='0.00 am'><i class='fas fa-calendar-alt'></i><input required name='to[]' class='inp-time' type='time' placeholder='0.00 am'></div>";
                
                

                $('#new_chq').append(new_input);
                $('#total_chq').val(new_chq_no);
            }

            function removeEvent() {
                var last_chq_no = $('#total_chq').val();

                if (last_chq_no > 1) {
                    $('#new_' + last_chq_no).remove();
                    $('#total_chq').val(last_chq_no - 1);
                }
            }

          

function btnReset(newListTitle){

    $checkCircle = newListTitle.children[0];
    $deleteBtn = newListTitle.children[2];

    $checkCircle.addEventListener('click', function(event){
        if(event.target.src === 'https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895684_o.png'){
            event.target.src = 'https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895683_o.png'
            event.target.parentElement.children[1].classList.add('finishedlist');
            listTarget = DATA.filter(a => a.id === event.target.parentElement.dataset.id)[0];
            listTarget.status = 'finished';
            
        }else{
            listTarget = DATA.filter(d => d.id === event.target.parentElement.dataset.id)[0];
            listTarget.status = 'unfinished';
            

            event.target.src = 'https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895684_o.png'
            event.target.parentElement.children[1].classList.remove('finishedlist');
        };
    });

    $deleteBtn.addEventListener('click', function(event){
        listTarget = DATA.filter(a => a.id === event.target.parentElement.dataset.id)[0];
        DATA.splice(DATA.indexOf(listTarget), 1);
        event.target.parentElement.remove();
        
        var listSameDateArr = DATA.filter(a => a.date === event.target.parentElement.dataset.date);
        if(listSameDateArr.length === 0){
            var $lis = document.querySelectorAll(`[data-id="cal-${clickedTime.getFullYear()}-${clickedTime.getMonth() + 1}-${clickedTime.getDate()}"]`);
            $lis.forEach(function($li){
                $li.querySelector('#dot').src = '';
            });
        };
    });
}

$todoWindowBtns.forEach(function($todoWindowBtn){
    $todoWindowBtn.addEventListener('click', function(event){
        $totalBtns.forEach(($totalBtn) => {$totalBtn.classList.remove('btn-click-color')});
        document.getElementById('calendar-left-box').classList.add('display-none');
        document.getElementById('todo-list-window').classList.add('display-block');
        event.target.classList.add('btn-click-color');

        var dateArr = [];

        $todoListWindow.innerHTML = '<div class="window-lists" id="window-list-box"><h3 id="window-date">2019년&nbsp&nbsp7월&nbsp&nbsp7일</h3><ul><li class="window-todo-list" id="window-li-clone"><img id="checkbox-circle" src="https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895684_o.png" alt=""><p>codingcoding</p><img id="delBtn" src="https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895686_o.png" alt=""></li></ul></div>';
        var $windowDivUl = document.getElementById('window-list-box');
        var j = 1;
        for(var i = 0; i < DATA.length; i++){
            if(dateArr.length === 0 || dateArr.indexOf(DATA[i].date) === -1){
                dateArr.push(DATA[i].date);
                var $windowDivUlClone = $windowDivUl.cloneNode(true);
                $windowDivUlClone.classList.add('display-block');
                $windowDivUl.parentElement.insertBefore($windowDivUlClone, $windowDivUl);
                document.querySelector(`#todo-list-window div:nth-of-type(${j}) h3`).textContent = dateArr[j - 1];
                document.querySelector(`#todo-list-window div:nth-of-type(${j}) ul`).dataset.id = `ul-${dateArr[j - 1]}`
                j += 1;
            }
        }
        
        for(var i = 0; i < dateArr.length; i++){
            var sameDateDATA = DATA.filter(a => a.date === dateArr[i]);
            for(var j = 0; j < sameDateDATA.length; j++){
                var $ulSameDate = document.querySelector(`[data-id="ul-${dateArr[i]}"]`);
                var $windowLi = $ulSameDate.querySelector('#window-li-clone');
                var $windowLiClone = $windowLi.cloneNode(true);
                $windowLiClone.classList.add('list-show');
                $windowLiClone.dataset.id = `${dateArr[i]}-${j}`;
                
                if(event.target.textContent === 'All'){ 
                    if(sameDateDATA[j].status === 'finished'){
                        $ulSameDate.querySelector('img').src = 'https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895683_o.png';
                    };
                    $ulSameDate.insertBefore($windowLiClone, $windowLi);
                    $ulSameDate.querySelector('p').textContent = sameDateDATA[j].content;
                    $ulSameDate.querySelector('#delBtn').src = '';
                    
                }else if(event.target.textContent === 'Active'){
                    if(sameDateDATA[j].status === 'unfinished'){
                        $ulSameDate.insertBefore($windowLiClone, $windowLi);
                        $ulSameDate.querySelector('p').textContent = sameDateDATA[j].content;
                        $ulSameDate.querySelector('#delBtn').src = '';
                    };
                }else if(event.target.textContent === 'Completed'){
                    if(sameDateDATA[j].status === 'finished'){
                        $ulSameDate.insertBefore($windowLiClone, $windowLi);
                        $ulSameDate.querySelector('p').textContent = sameDateDATA[j].content;
                        $ulSameDate.querySelector('img').src = 'https://img.auctiva.com/imgdata/2/0/3/3/6/7/8/webimg/1030895683_o.png';
                        $ulSameDate.querySelector('#delBtn').src = '';
                    };
                }
                
            };   
        };
    });
});

$calandarBtn.addEventListener('click', function(){
    $totalBtns.forEach(($totalBtn) => {$totalBtn.classList.remove('btn-click-color')});
    document.getElementById('calendar-left-box').classList.remove('display-none');
    document.getElementById('todo-list-window').classList.remove('display-block');
    event.target.classList.add('btn-click-color');
    
   
    
});
