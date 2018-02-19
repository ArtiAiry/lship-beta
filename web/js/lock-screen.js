var goLockScreen = false;
var stop = false;
var autoLockTimer;
window.onload = resetTimer;
window.onmousemove = resetTimer;
window.onmousedown = resetTimer; // catches touchscreen presses
window.onclick = resetTimer;     // catches touchpad clicks
window.onscroll = resetTimer;    // catches scrolling with arrow keys
window.onkeypress = resetTimer;

function lockScreen() {
    stop = true;
    window.location.href = "'.\yii\helpers\Url::toRoute(['/site/lock-screen']).?previous='+encodeURIComponent(window.location.href)";
}

function lockIdentity(){
    goLockScreen = true;
}

function resetTimer() {
    if(stop==true){

    }
    else if (goLockScreen) {
        lockScreen();
    }
    else{
        clearTimeout(autoLockTimer);
        autoLockTimer = setTimeout(lockIdentity, 100*15*60);  // time is in milliseconds
    }

}