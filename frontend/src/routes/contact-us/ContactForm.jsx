import { css } from '@emotion/react';
import { Button, Form } from 'react-bootstrap';

export default function ContactForm() {
  return (
    <Form
      css={css`
        /* padding-top: 22px;
        padding-bottom: 20px; */
        padding-left: 10px;
        padding-right: 10px;

        @media (min-width: 992px) {
          padding-left: 20%;
          padding-right: 20%;
        }
      `}
    >
      <Form.Group controlId='formName'>
        <Form.Label>Name</Form.Label>
        <Form.Control type='text' placeholder='Enter your name' />
      </Form.Group>
      <Form.Group controlId='formEmail' className='mt-3'>
        <Form.Label>Email address</Form.Label>
        <Form.Control type='email' placeholder='Enter your email' />
      </Form.Group>
      <Form.Group controlId='formMessage' className='mt-3'>
        <Form.Label>Message</Form.Label>
        <Form.Control as='textarea' rows={3} placeholder='Enter your message' />
      </Form.Group>
      <Button
        variant='warning'
        style={{
          width: '100%',
          backgroundColor: 'red',
          borderColor: 'red',
          color: 'white',
          fontWeight: 'bold',
        }}
        type='submit'
        className='mt-4'
        data-aos='fade-up'
      >
        Send
      </Button>
    </Form>
  );
}
