import React from 'react'

export default (props) => (
  <div className={`w-full shadow mb-6 bg-white text-gray-700 font-mono flex flex-col`}>
    <div className={`flex-1 p-3`} dangerouslySetInnerHTML={{__html: props.comment.content}}></div>
    <div className={`text-right p-1 font-sans text-gray-500`}>{props.comment.posted_on.diff}</div>
    <div className={`h-1 bg-blue-400 lg:hidden`}></div>
  </div>
)
