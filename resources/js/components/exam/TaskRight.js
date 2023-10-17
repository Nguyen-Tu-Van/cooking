import React, { useContext, useRef } from 'react';
import {ThemeContext} from './Exam'
function TaskRight({stick,pin,handlePin,answer,handleAnswer}) {
    const [exam,questions] = useContext(ThemeContext)
    const word = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N'];
    return (
        <div className="col-lg-8">
            <div className="card p-3">
                <div dangerouslySetInnerHTML={{ __html: exam.content }}>
                </div>
                {exam.file &&
                <audio controls="controls" dangerouslySetInnerHTML={{ __html: `<source src='${exam.file}' type="audio/mpeg"/>` }}>
                </audio>
                }
            </div>
            {   questions.map((question,index) => (
                <div className={`card mb-1 pb-2 ${stick==index+1?"answer-stick":""}`} key={question.id} id={"question"+(index+1)}>
                    <div className="card-header header-elements-inline pb-2">
                        <h5 className="card-question">Câu {index+1}: {question.content} &emsp;<span className="badge badge-exam badge-secondary" dangerouslySetInnerHTML={{ __html: question.score+" đ" }}></span>&nbsp;
                            {question.level==1 && <span className="badge badge-exam badge-primary">Easy</span>}

                            {question.level==2 && <span className="badge badge-exam badge-success">Medium</span>}

                            {question.level==3 && <span className="badge badge-exam badge-danger">Hard</span>}

                        </h5>
                        <div className="header-elements">
                            <div className="list-icons icon-group">
                                <label className="custom-control custom-control-danger custom-checkbox mb-2">
                                    {pin.includes(index+1) && <input type="checkbox" checked onChange={()=>handlePin(index+1)} className="custom-control-input"/> }
                                    {!pin.includes(index+1) && <input type="checkbox" onChange={()=>handlePin(index+1)} className="custom-control-input"/> }
                                    <span className="custom-control-label"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div className="collapse collapse-question show">
                        <div className="card-body">
                            <div className="d-flex flex-column rounded">
                                <div>
                                    {question.answers.map((item,indexAnswer) => (
                                        <div key={item.id} className={`answer text-justify border-top border-white py-2 px-3 ${answer[index]==item.id?"bg-primary text-white":"bg-light"}`} onClick={()=>handleAnswer(index,item.id)}>
                                            {word[indexAnswer]}. {item.answer}
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                )
            )}
        </div>
    );
}

export default TaskRight;