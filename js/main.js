const userName = document.getElementById('userNameID');
const userEmail = document.getElementById('userEmailID');
const userPass = document.getElementById('userPassID');
const userCnfPass = document.getElementById('userCnfPassID');

//Check for Empty Value


function emptyString() {
    if (userName === '' || userEmail === '' || userPass === '' || userCnfPass === '') {
        alert('No Data')
        return false;
    }  
    return true  
}
