import React from 'react'

import Modal from '../components/Modal'

export default class AddCommentModal extends React.Component {

  ref = React.createRef();

  componentDidUpdate() {
    if(this.props.show === true) {
      this.ref.current.focus();
      this.ref.current.value = '';
    }
  }

  render() {
    const {show, onAddComment, handleOnCancel} = this.props;

    return (
      <Modal show={show} handleOnOk={onAddComment} handleOnCancel={handleOnCancel} title={`Add Comment`}>
        <textarea
          ref={this.ref}
          tabIndex="1"
          className={`p-2 h-24 resize-none w-full border border-gray-400 outline-none`}
          placeholder={`Type a comment here..`}
        ></textarea>
      </Modal>
    )
  }

}
