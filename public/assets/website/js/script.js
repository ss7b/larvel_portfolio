// active class on list
let nav= document.querySelector(".aside-nav");
let navList = document.querySelectorAll("li")
let allSection = document.querySelectorAll(".section")
for (let i = 0; i < navList.length; i++) {

    let a= navList[i].querySelector("a");
    a.addEventListener('click',function(){
        removeBakcSection()
        for (let j = 0; j < navList.length; j++) {
            if(navList[j].querySelector("a").classList.contains('active')){
                addBackSection(j)
            }

            navList[j].querySelector('a').classList.remove("active")
            
        }

        this.classList.add("active")
        showSection(this)
        if(window.innerWidth < 1100){
            openAside()
        }
    })
}
//  back section
function removeBakcSection(){
    for (let i = 0; i < allSection.length; i++) {
        allSection[i].classList.remove("back-section")        
    }
}
function addBackSection(num){
    allSection[num].classList.add("back-section")
}
// ----------show section
// function showSection(e){
//     for (let i = 0; i < allSection.length; i++) {
//         allSection[i].classList.remove("active")        
//     }
//     let target= e.getAttribute("href").split("#")[1];
//     document.querySelector("#" + target).classList.add("active")
//     console.log(e.getAttribute("href").split("#")[0])
// }
function showSection(e){
    for (let i = 0; i < allSection.length; i++) {
        allSection[i].classList.remove("active")        
    }
    let target= e.getAttribute("href").split("#");
    let po = target.pop()
    console.log(po)
    document.querySelector("#" + po).classList.add("active")
}

function ubdateNav(e){
    for (let i = 0; i < navList.length; i++) {
        navList[i].querySelector("a").classList.remove('active')
        let target= e.getAttribute("href").split("#")[1];
        if(target === navList[i].querySelector("a").getAttribute("href").split("#")[1]){
        navList[i].querySelector("a").classList.add('active')
        }
    }
}

// document.querySelector(".hire-me").addEventListener("click",function(){
//     let dataIndex = this.getAttribute("data-section-index")
//     showSection(this)
//     ubdateNav(this)
//     removeBakcSection()
//     addBackSection(dataIndex)
// })




// toggler btn

let togglerBtn = document.querySelector(".nav-toggler "),
    aside = document.querySelector(".aside");

togglerBtn.addEventListener("click",()=>{
    openAside()
})
function openAside(){
    aside.classList.toggle("open")
    togglerBtn.classList.toggle("open")
    for (let i = 0; i < allSection.length; i++) {
        allSection[i].classList.toggle("open")        
    }
}
document.getElementById("overlay").addEventListener("click",function(){
    aside.classList.remove("open")
    togglerBtn.classList.remove("open")
})

// view degree
let view = document.querySelectorAll(".view");
let g = document.querySelectorAll(".graduation");
console.log(g)
view.forEach(v => {
    v.addEventListener("click",function(e){
        e.currentTarget.classList.toggle("active")
    })
});


// الحصول على تاريخ الميلاد من عنصر الإدخال
var birthday = new Date(document.getElementById("birthday").textContent);

// الحصول على التاريخ الحالي
var today = new Date();

// حساب الفرق في السنوات
var age = today.getFullYear() - birthday.getFullYear();
console.log(age);

// حساب الفرق في الأشهر
var month = today.getMonth() - birthday.getMonth();

// تعديل العمر إذا كان الشهر الحالي أقل من شهر الميلاد
if (month < 0 || (month === 0 && today.getDate() < birthday.getDate())) {
age--;
}

// عرض النتيجة
document.getElementById("age").textContent = age;