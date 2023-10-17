import React, { createContext, useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import TaskLeft from "./TaskLeft";
import TaskRight from "./TaskRight";
import axios from 'axios';
import "./App.css";

export const ThemeContext = createContext();

function Exam() {
    const [exam,setExam] = useState({});
    const [questions,setQuestions] = useState([]);
    const [pin,setPin] = useState([]);
    const [answer,setAnswer] = useState(document.getElementById("answers_exam").value.replaceAll("\"","").split(","));
    const [stick,setStick] = useState(0);
    const organizeExamId = window.location.href.split('/').reverse()[0];
    console.log(document.getElementById("answers_exam").value.split(","))
    useEffect(() =>{
        async function getDataExam()
        {
            const response = await axios.get(`/api/organize-exam/`+organizeExamId);
            const data = await response.data;
            return data;
        } 
        async function getDataQuestions()
        {
            const response = await axios.get(`/api/organize-question/`+organizeExamId)
            const data = await response.data;
            return data;
        }
        async function getData() {
            setExam(await getDataExam());
            setQuestions(await getDataQuestions()); 
        }
        getData();
    },[])

    const scrollSmoothTo = (elementId) => {
        var element = document.getElementById(elementId);
        console.log(elementId,element);
        element.scrollIntoView({
          block: 'start',
          behavior: 'smooth'
        });
      }

    const handleStick =  (index) => {
        scrollSmoothTo("question"+index);
        if(stick==index) setStick(0);
        else setStick(index);
    }
    const handlePin = (value) => {
        if(pin.includes(value))
        {
            let index = pin.indexOf(value);
            pin.splice(index, 1);
        }
        else pin.push(value);
        setPin([...pin]);
    }
    const handleAnswer = (numQuestion,myAnswer) => {
        if(answer[numQuestion] == myAnswer)
        {
            answer[numQuestion] = undefined;
        }
        else answer[numQuestion] = myAnswer;
        setAnswer([...answer]);
    }
    const handleSaveExam = () => {
        async function saveExam()
        {
            const response = await axios.put('/api/save-exam/',{
                // headers: {
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                data : {
                    questions :questions,
                    answers : answer,
                    organize_exam_id : organizeExamId,
                    user_id : document.getElementById("user_id").value
                }
            });
            const data = await response;
            if(data.status==200){
                new Noty({
                    text: 'Lưu bài thành công',
                    type: 'success'
                }).show();
            }
            else{
                new Noty({
                    text: 'Lưu bài thất bại',
                    type: 'danger'
                }).show();
            }
        } 
        saveExam();
    }
    const handleSubmitExam = (bool) => {
        async function submitExam()
        {
            if(bool){
                if(!confirm('Bạn có chắc chắn muốn nộp bài không ?')){return false}
            }
            const response = await axios.put('/api/submit-exam/',{
            data : {
                questions :questions,
                answers : answer,
                organize_exam_id : organizeExamId,
                user_id : document.getElementById("user_id").value
            }});
            const data = await response;
            if(data.status==200){
                location.href = "/user/list-exam";
            }
            else{
                new Noty({
                    text: 'Nộp bài thất bại',
                    type: 'danger'
                }).show();
            }
        } 
        submitExam();
    }
    return (
        <ThemeContext.Provider value={[exam,questions]}>
        <div className="row">
            <TaskLeft pin={pin} stick={stick} handleStick={handleStick} answer={answer} handleSaveExam={handleSaveExam} handleSubmitExam={handleSubmitExam}/>
            <TaskRight stick={stick} pin={pin} handlePin={handlePin} answer={answer} handleAnswer={handleAnswer}/>
        </div>
        </ThemeContext.Provider>
    );
}

export default Exam;

if (document.getElementById('content')) {
    ReactDOM.render(<Exam />, document.getElementById('content'));
}
