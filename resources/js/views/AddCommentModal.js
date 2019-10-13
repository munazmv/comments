import React from 'react'
import {toast} from 'react-toastify'
import Modal from '../components/Modal'
import {createComment} from "../apiServices/CommentService";

export default class AddCommentModal extends React.Component {

  state = {
    error: null
  }

  ref = React.createRef();

  componentDidUpdate() {
    if(this.props.show === true) {
    }
  }

  handleOnOk = () => {
    const value = this.ref.current.value;
    this.setState({error: null});

    createComment({comment: value}).then(response => {
      console.log('response here');
      this.props.onAddComment();
    }).catch(({response}) => {
      if(response.status === 422) {
        toast.error("Validation errors occurred", {
          position: toast.POSITION.TOP_RIGHT,
          hideProgressBar: true
        });
        this.setState({error: 'No content in comment input!'})
      }
    });
  }

  handleOnCancel = () => {
    this.setState({
      error: null
    })
    this.ref.current.focus();
    this.ref.current.value = '';
    this.props.handleOnCancel();
  }

  render() {
    const {error} = this.state;
    const {show, handleOnCancel} = this.props;

    return (
      <Modal show={show} okButtonText={`Add Comment`} handleOnOk={this.handleOnOk} handleOnCancel={this.handleOnCancel} title={`Add Comment`}>
        <textarea
          ref={this.ref}
          tabIndex="1"
          className={`font-mono p-2 h-24 resize-none w-full border border-gray-400 outline-none`}
          placeholder={`Type a comment here..`}
        ></textarea>
        {error ? <span className="text-red-600 text-xs">{error}</span> : null}
      </Modal>
    )
  }

}
