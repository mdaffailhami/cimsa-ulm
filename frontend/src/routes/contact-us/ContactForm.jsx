import { css } from '@emotion/react';
import { Button, Form } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';

export default function ContactForm() {
  return (
    <Form
      data-aos='fade-down'
      data-aos-duration='1200'
      data-aos-once='true'
      css={css`
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
      <div data-aos='zoom-out' data-aos-duration='1200' data-aos-once='true'>
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
          css={OnHoverAnimationCss(
            1.015,
            css`
              background: white !important;
              color: red !important;
            `
          )}
        >
          Send
        </Button>
      </div>
    </Form>
  );
}
