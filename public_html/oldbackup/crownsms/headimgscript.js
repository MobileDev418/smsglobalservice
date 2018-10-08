// JavaScript Document

// ==============================
// Set the following variables...
// ==============================

// Set the slideshow speed (in milliseconds)
var SlideShowSpeed = 2000;

// Set the duration of crossfade (in seconds)
var CrossFadeDuration = 2;

var Picture = new Array(); // don't change this
var Caption = new Array(); // don't change this

Picture[1]  = 'images/sms-clock.jpg';
Picture[2]  = 'images/headimgs4.jpg';
Picture[3]  = 'images/headimgs5.jpg';
Picture[4]  = 'images/headimgs6.jpg';
Picture[5]  = 'images/headimgs7.jpg';


Caption[1]  = "";
Caption[2]  = "";
Caption[3]  = "";
Caption[4]  = "";
Caption[5]  = "";

// =====================================
// Do not edit anything below this line!
// =====================================

var tss;
var iss;
var jss = 1;
var pss = Picture.length-1;

var preLoad = new Array();
for (iss = 1; iss < pss+1; iss++){
preLoad[iss] = new Image();
preLoad[iss].src = Picture[iss];}

function runSlideShow(){
if (document.all){
document.images.PictureBox.style.filter="blendTrans(duration=2)";
document.images.PictureBox.style.filter="blendTrans(duration=CrossFadeDuration)";
document.images.PictureBox.filters.blendTrans.Apply();}
document.images.PictureBox.src = preLoad[jss].src;
if (document.getElementById) document.getElementById("CaptionBox").innerHTML= Caption[jss];
if (document.all) document.images.PictureBox.filters.blendTrans.Play();
jss = jss + 1;
if (jss > (pss)) jss=1;
tss = setTimeout('runSlideShow()', SlideShowSpeed);
}