import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Reaction from './Reaction';
import { v4 as uuidv4, v6 as uuidv6 } from 'uuid';

function Comment({room_chat_id}) {
    const [roomComment,setroomComment] = useState([]);
    const handleReaction = (reaction,comment_id) =>{
        async function createReaction()
        {
            let response = await axios.put('/api/reaction/',{
                "reaction" : reaction,
                "user_id" : document.getElementById("user_id").value,
                "employee_id" : null,
                "room_comment_id" : comment_id,
                "room_chat_id" : 0
            })

            if(response.status==200){
                socket.emit("client-send-reaction",{message:true,id : comment_id,type : "comment"});
            }
        }
        createReaction();
    }
    useEffect(() =>{
        var socket = io("http://localhost:3456");
        socket.on("server-send-comment",function(data) {
            if(data.message && data.room_chat_id == room_chat_id)
            {
                getDataRoomCommnet();
            }
        })

        async function getDataRoomCommnet()
        {
            try{
                const response = await axios.get('/api/room-comment/'+room_chat_id);
                await setroomComment(await response.data);
                scrollChat();
            }catch(err){}
        } 
        // function scrollChat() {
        //     let objDiv = document.getElementById("chat_scroll");
        //     objDiv.scrollTop = objDiv.scrollHeight;
        // }
        getDataRoomCommnet();
    },[])
    return (
        <div>
            {roomComment.map(comment => (
            <div key={uuidv4()} className="card-body room pb-1">
                <ul className="media-list">
                    <li className="media flex-column flex-lg-row">
                        <div className="mr-lg-3 mb-2 mb-lg-0">
                            <a href="#"><img src="common/images/logo/toeic.png" className="rounded-circle" width="38" height="38" alt=""/></a>
                        </div>
                        <div className="media-body">
                            <div className="media-title" style={{display: "flex",justifyContent: "space-between",marginBottom: 0}}>
                                <div style={{lineHeight: "2em"}}>
                                    { comment.user && <a href="#" className="font-weight-semibold">{comment.user.name}</a>}
                                    { comment.employee && <a href="#" className="font-weight-semibold">{comment.employee.name}</a>}
                                    <span className="text-secondary ml-3">{comment.updated}</span>
                                </div>
                                <div className="breadcrumb-elements-item dropdown p-0" style={{marginTop: "-1em",display:"none"}}>
                                    <a className="list-icons-item mr-1" onClick={()=>handleReaction("👍",comment.id)}>👍</a>
                                    <a className="list-icons-item mr-1" onClick={()=>handleReaction("❤️",comment.id)}>❤️</a>
                                    <a className="list-icons-item mr-1" onClick={()=>handleReaction("😆",comment.id)}>😆</a>
                                    <a className="list-icons-item mr-1" onClick={()=>handleReaction("😟",comment.id)}>😟</a>
                                    <a className="list-icons-item mr-1" onClick={()=>handleReaction("😠",comment.id)}>😠</a>
                                    <a href="#" className="breadcrumb-elements-item" data-toggle="dropdown" aria-expanded="false">
                                        <i className="mi-more-vert mr-2"></i>
                                    </a>
                                    <div className="dropdown-menu dropdown-menu-right" style={{width: "50px"}}>
                                        <a href="#" className="dropdown-item"><i className="icon-user-lock"></i> Edit</a>
                                        <a href="#" className="dropdown-item"><i className="icon-statistics"></i> Delete</a>
                                    </div>
                                </div>
                            </div>

                            <p>{comment.content}</p>

                            <Reaction id={comment.id} type={"comment"}/>

                        </div>
                    </li>
                </ul>
            </div>
        ))}
        </div>
    );
}

export default Comment;

