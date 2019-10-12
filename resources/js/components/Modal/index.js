import React from 'react'

import './index.css'

export default (props) => {

  const onOk = () => {
    props.handleOnOk();
  }

  const onCancel = () => {
    props.handleOnCancel();
  }

  return (
    <div className={`fixed w-full h-full top-0 left-0 flex items-center justify-center 
      ${!props.show ? `hidden` : `modal modal-active`}
    `}>
      <div className="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onClick={onCancel}></div>

      <div className="modal-container bg-white w-11/12 md:9/12 lg:w-2/5 mx-auto shadow-lg z-50 overflow-y-auto">

        <div className="modal-content py-4 text-left px-6">
          <div className="flex justify-between items-center pb-3">
            <p className="text-2xl font-bold">{props.title}</p>
            <div className="modal-close cursor-pointer z-50" onClick={onCancel}>
              <svg className="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>
          </div>

          {props.children}

          <div className="flex justify-end pt-2">
            <button className="modal-close px-4 bg-blue-600 p-2 text-white hover:bg-indigo-400" onClick={onOk}>Ok</button>
          </div>
        </div>
      </div>
    </div>
  )
}
