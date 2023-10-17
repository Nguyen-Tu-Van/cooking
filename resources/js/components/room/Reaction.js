import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { v4 as uuidv4, v6 as uuidv6 } from 'uuid';

function Reaction({id,type}) {
    const [listIcon, setListIcon] = useState([]);
    useEffect(() => {
        var socket = io("http://localhost:3456");
        socket.on("server-send-reaction",function(data) {
            if(data.message && id==data.id && type==data.type)
            {
                if(type=='chat'){
                    getDataReactionChat();
                }
                else if(type=='comment'){
                    getDataReactionComment();
                }
            }
        })
        async function getDataReactionChat()
        {
            try{
                const response = await axios.get('/api/reaction-chat/'+id);
                setListIcon(await response.data);
            }catch(err){
                console.log(err);
            }
        } 
        async function getDataReactionComment()
        {
            try{
                const response = await axios.get('/api/reaction-comment/'+id);
                setListIcon(await response.data);
            }catch(err){
                console.log(err);
            }
        }
        if(type=='chat'){
            getDataReactionChat();
        }
        else if(type=='comment'){
            getDataReactionComment();
        }
    },[])
    return (
        <div className="media-title">
            {listIcon.map((icon,index) => (
                <a key={uuidv4()} className="list-icons-item emoj-icon">{icon.reaction} {icon.qty}</a>
            ))}
        </div>
    );
}

export default Reaction;

