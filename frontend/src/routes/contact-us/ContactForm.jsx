import { css } from '@emotion/react';
import { Button, Form } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';
import { useScript } from '../../utils';

export default function ContactForm({ web3formsKey }) {
  // Script for Web3Forms Captcha
  useScript('https://web3forms.com/client/script.js');

  return (
    <Form
      action='https://api.web3forms.com/submit'
      method='POST'
      onSubmit={(e) => {
        const hCaptcha = document.querySelector(
          'textarea[name=h-captcha-response]'
        ).value;

        if (!hCaptcha) {
          e.preventDefault();
          alert('Please fill in the Captcha');
          return;
        }
      }}
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
      {/* Web3Forms */}
      <input type='hidden' name='access_key' value={web3formsKey}></input>
      {/* /Web3Forms */}
      <Form.Group controlId='formName'>
        <Form.Label>Name</Form.Label>
        <Form.Control name='name' type='text' placeholder='Enter your name' />
      </Form.Group>
      <Form.Group controlId='formEmail' className='mt-3'>
        <Form.Label>Email address</Form.Label>
        <Form.Control
          name='email'
          type='email'
          placeholder='Enter your email'
        />
      </Form.Group>
      <Form.Group controlId='formMessage' className='mt-3'>
        <Form.Label>Message</Form.Label>
        <Form.Control
          name='message'
          as='textarea'
          rows={3}
          placeholder='Enter your message'
        />
      </Form.Group>

      {/* Web3Forms Captcha */}
      <div style={{ display: 'flex' }}>
        <div style={{ flexGrow: 1 }} />
        <div
          className='h-captcha'
          data-captcha='true'
          style={{ marginTop: '10px' }}
        />
      </div>
      {/* /Web3Forms Captcha */}

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
