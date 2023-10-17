import React, { useContext, useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import {ThemeContext}  from './Exam';
function TaskLeft({pin,answer,stick,handleStick,handleSaveExam,handleSubmitExam}) {
    const [exam,questions] = useContext(ThemeContext);
    let yes_answer = answer.filter(c=>c!=undefined&&c!=null&c!="null"&&c!="").length;
    let no_answer = questions.length - yes_answer;
    let stick_answer = pin.length;
    let distance = document.getElementById("end_time_exam").value*1000;
    useEffect(()=>{
        const x = setInterval(function() {
            if(distance >= 0)
            {
                // Time calculations for days, hours, minutes and seconds
                let hours = Math.floor(distance / (1000 * 60 * 60));
                if(hours < 10) hours = "0" + hours;
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                if(minutes < 10) minutes = "0"+ minutes;
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if(seconds < 10) seconds = "0"+seconds;
                
                // Output the result in an element with id="demo"
                document.getElementById("demo").innerHTML = "  " + hours + " : "
                + minutes + " : " + seconds;
                distance = distance - 1000;
            }
            // If the count down is over, write some text 
            if (distance < 0) {
              clearInterval(x);
              document.getElementById("demo").innerHTML = "Hết giờ làm bài";
              document.getElementById("submitExam").click();
            }
          }, 1000);
    },[exam.work_time])
    return (
        <div className="col-lg-4">
            <div className="card card-left">
            <div className="card-header bg-transparent text-center">
                <h2 className="card-title">{exam.name}</h2>
            </div>

            <div className="card-body">
                <span className="d-flex justify-content-center text-center badge badge-secondary icon-alarm p-2" style={{fontSize:"20px"}} > &nbsp; <span id="demo">00 : 00 : 00</span></span>
            </div>

            <div className="card-footer d-flex align-items-center bg-white">
                <ul className="list-inline list-inline-condensed mb-0">
                    <li className="list-inline-item">
                        <div className="no_answer"></div> Chưa làm
                        <h3 className="mb-0">{no_answer}</h3>
                    </li>
                    <li className="list-inline-item">
                        <div className="yes_answer"></div> Đã làm
                        <h3 className="mb-0">{yes_answer}</h3>
                    </li>
                    <li className="list-inline-item">
                        <div className="stick_answer"></div> Đánh dấu
                        <h3 className="mb-0">{stick_answer}</h3>
                    </li>
                </ul>
            </div>

            <div className="card-footer bg-white">
                <div>
                    <h6>Danh sách câu hỏi</h6>
                </div>
                <div className="list_question">
                {/* <a className="btn btn-primary stick active" href="">1<div className="pin"></div></a> */}
                {questions.map((question, index)=>(
                    <a 
                        key={question.id} 
                        className={`btn ${(answer[index]!=undefined && answer[index]!='null' && answer[index]!='')?"btn-primary":"btn-light"} ${stick==index+1?"stick":""}`} 
                        onClick={()=>handleStick(index+1)}
                    >{index+1}
                    {pin.includes(index+1) && <div className="pin"></div>}
                    </a>
                ))}
                </div>
                <button type="button" className="btn btn-indigo w-100 mt-2" style={{fontSize:"17px"}} onClick={()=> handleSaveExam()}><i className="icon-map5"></i> Lưu bài gần nhất</button>
                {no_answer==0 && <button type="button" className="btn btn-success w-100 mt-2" style={{fontSize:"17px"}} onClick={()=> handleSubmitExam(true)}><i className="icon-paperplane"></i> Nộp bài</button>}
                <button type="button" className="btn btn-success w-100 mt-2" id="submitExam" style={{fontSize:"17px",display:"none"}} onClick={()=> handleSubmitExam(false)}><i className="icon-paperplane"></i> Nộp bài</button>
                {no_answer!=0 && <button type="button" className="btn btn-success w-100 mt-2" disabled style={{fontSize:"17px"}}> <i className="icon-paperplane"></i> Nộp bài</button>}
                
            </div>


            </div>
        </div>
    );
}

export default TaskLeft;