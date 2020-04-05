
function calcQuiz() {
  let q1 = parseInt(document.getElementById("quiz1").value);
  let q2 = parseInt(document.getElementById("quiz2").value);
  let q3 = parseInt(document.getElementById("quiz3").value);

  console.log(q1);

  if (isNaN(q1) || isNaN(q2) || isNaN(q3)) {
    document.getElementById("quiz_output").innerText = "invalid";
  }
  else {
    document.getElementById("quiz_output").innerText = Math.round((q1 + q2 + q3) / 3);
  }
}

function calcAttendance() {
  let sessions = parseInt(document.getElementById("lecture_sessions").value);
  let present = parseInt(document.getElementById("lecture_present").value);

  if (sessions > present && !isNaN(sessions) && !isNaN(present)) {
    document.getElementById("attend_output").innerText = Math.round((present / sessions) * 100);
  } else {
    document.getElementById("attend_output").innerText = "invalid";
  }

}
