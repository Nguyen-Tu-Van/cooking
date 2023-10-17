import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Repply from './Repply';
import Comment from './Comment';
import Reaction from './Reaction';

function Chat({chat,handleRepply,comment}) {
    const handleReaction = (reaction) =>{
        async function createReaction()
        {
            let response = await axios.put('/api/reaction/',{
                "reaction" : reaction,
                "user_id" : document.getElementById("user_id").value,
                "employee_id" : null,
                "room_comment_id" : 0,
                "room_chat_id" : chat.id
            })
            if(response.status==200){
                socket.emit("client-send-reaction",{message:true,id : chat.id,type : "chat"});
            }
        }
        createReaction();
    }
    return (
        <div className="card  w-100">
            <div className="card-header header-elements-sm-inline room">
                <h5 className="card-title">Bài đăng số {chat.id}</h5>
                <div className="header-elements">
                    <div className="list-icons">
                        <div className="breadcrumb-elements-item dropdown p-0" style={{marginTop: "-1em",display: "none"}}>
                            <a className="list-icons-item mr-1" onClick={(e)=>{ handleReaction("👍")}}>👍</a>
                            <a className="list-icons-item mr-1" onClick={(e)=>{ handleReaction("❤️")}}>❤️</a>
                            <a className="list-icons-item mr-1" onClick={(e)=>{ handleReaction("😆")}}>😆</a>
                            <a className="list-icons-item mr-1" onClick={(e)=>{ handleReaction("😟")}}>😟</a>
                            <a className="list-icons-item mr-1" onClick={(e)=>{ handleReaction("😠")}}>😠</a>
                            <a href="#" className="breadcrumb-elements-item" data-toggle="dropdown" aria-expanded="false">
                                <i className="mi-more-vert mr-2"></i>
                            </a>
                            <div className="dropdown-menu dropdown-menu-right" style={{width: "50px"}}>
                                <a href="#" className="dropdown-item"><i className="icon-user-lock"></i> Edit</a>
                                <a href="#" className="dropdown-item"><i className="icon-statistics"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="media card-body flex-column flex-lg-row m-0">
                <div className="mr-lg-3 mb-2 mb-lg-0">
                    <a href="#">
                    { chat.user && <img src="common/images/logo/main.png" className="rounded-circle" width="64" height="64" alt=""/>}
                    { chat.employee && <img src="common/images/logo/main.png" className="rounded-circle" width="64" height="64" alt=""/>}
                    </a>
                </div>
                <div className="media-body">
                    { chat.user && <h6 className="media-title font-weight-semibold">{chat.user.name} <span className="text-secondary ml-3">{chat.updated}</span></h6>}
                    { chat.employee && <h6 className="media-title font-weight-semibold">{chat.employee.name} <span className="text-secondary ml-3">{chat.updated}</span></h6>}
                    <p>{chat.content}</p>
                    
                    <Reaction id={chat.id} type={"chat"}/>

                </div>
            </div>
            <div className="card-body p-1">
                <ul className="media-list">
                    <li className="media flex-column flex-lg-row">
                        <div className="media-body">
                            <div className="media-title" style={{cursor: "pointer"}}>
                                <span className="text-muted ml-3"><i className="mi-comment"></i> 100 bình luận trước</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <Comment room_chat_id={chat.id}/>
            {   comment === chat.id &&
                <Repply handleRepply={handleRepply} room_chat_id={chat.id}/>
            }
            {
                comment !== chat.id &&
                <div className="card-body p-1">
                    <ul className="media-list">
                        <li className="media flex-column flex-lg-row">
                            <div className="media-body">
                                <div className="media-title" style={{cursor: "pointer"}} onClick={()=>handleRepply(chat.id)}>
                                    <span className="text-muted ml-3"><i className="mi-keyboard-return"></i> Trả lời</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            }
        </div>
    );
}

export default Chat;

