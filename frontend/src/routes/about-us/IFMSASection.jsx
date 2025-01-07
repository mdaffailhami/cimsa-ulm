import { css } from '@emotion/react';
import { Col, Container, Image, Row } from 'react-bootstrap';
import PrimaryButton from '../PrimaryButton';

export default function IFMSASection() {
  return (
    <Container
      css={css`
        color: #1f3868;
        text-align: center;
        @media (min-width: 992px) {
          width: 720px;
        }
      `}
    >
      <br />
      <br />
      <h2>
        <b>We are internationally affiliated.</b>
      </h2>
      <p style={{ fontSize: '20px' }}>
        CIMSA is Indonesia's national member organization (NMO) for the IFMSA,
        the international representative organization of medical students,
        recognized by the WHO.
      </p>
      <br />
      <Container>
        <Row
          xs={1}
          sm={1}
          md={2}
          css={css`
            align-items: center;
            padding: 12px 0;
            border-radius: 30px;
            box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);
          `}
        >
          <Col>
            <Image
              fluid
              alt='IFMSA Logo'
              src='https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2021/09/IFMSA-1.jpg'
              css={css`
                border-radius: 30px;
              `}
            />
          </Col>
          <Col
            style={{
              display: 'flex',
              flexDirection: 'column',
              alignItems: 'start',
            }}
          >
            <p style={{ textAlign: 'left', color: 'black' }}>
              IFMSA is a <b>non-profit</b>, <b>non-governmental</b>, and{' '}
              <b>non-partisan</b> <b>federation</b> representing{' '}
              <b>association of medical students internationally</b>. Since
              1951, <b>IFMSA has been run</b> for and by medical students{' '}
              <b>around the world</b>. IFMSA has been{' '}
              <b>recognized by the United Nations’ System</b> and
              <b> World Health Organization</b>.
              <b> CIMSA has been affiliated</b> with the IFMSA{' '}
              <b>since 2002 </b>and is the{' '}
              <b>sole representative since September 11th, 2019</b>.
            </p>
            <PrimaryButton to='/about-us/ifmsa' color='#1f3868' isLarge={false}>
              <i className='fa-solid fa-arrow-right' /> More on the IFMSA
            </PrimaryButton>
          </Col>
        </Row>
      </Container>
      <br />
      <br />
    </Container>
  );
}
