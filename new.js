const nDate = new Date();
var {log} = console;
var passed = (time)=>{
    let date= nDate.toLocaleString('en-US', {
        timeZone: 'Africa/Lagos'
    });
    let arr = date.split(' ');
    let th = parseInt(time.split(':')[0]);
    let tm = parseInt(time.split(':')[1]);
    let h = parseInt(arr[1].split(':')[0]);
    if(arr[3]==='PM'){
        h = parseInt(h)+12;
    }
    let m = parseInt(arr[1].split(':')[1]);
    if(h>th){
        return true;
    }else if(h===th && m>tm){
        return true;
    }else if(h===th && m<tm){
        return false;
    }else{
        return false;
    }
}
